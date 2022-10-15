package Chess.Console;

import Chess.Core.Board;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.Piece;

import java.util.HashSet;
import java.util.List;
import java.util.SortedSet;

public class DrawBoard
{
    private static final String columnRow =         "+-------+-------+-------+-------+-------+-------+-------+-------+";
    private static final String columnIndicator =   "      a       b       c       d       e       f       g       h";
    private static final String emptyColumn =       "|       ";
    private static final String availableColumn =   "| *   * ";
    private static final String columnSeparator =   "|";
    private static final String threeSpaces =       "   ";
    private static final String twoSpaces =         "  ";
    private static final String oneSpace =          " ";
    private static final String newLine =           "\n";

    public String draw(Board board, HashSet<Coords> availableMoves, List<Piece> takenPieces) throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        StringBuilder drawnBoard = new StringBuilder();
        drawnBoard.append(twoSpaces).append(columnRow);
        if (!takenPieces.isEmpty())
            drawTakenPieces(takenPieces, drawnBoard);
        drawnBoard.append(newLine);
        for (var y = 8; y >= 1; --y)
            drawRow(board, availableMoves, drawnBoard, y);
        drawnBoard.append(columnIndicator);
        return drawnBoard.toString();
    }

    private void drawTakenPieces(List<Piece> takenPieces, StringBuilder drawnBoard)
    {
        drawnBoard.append(twoSpaces).append("Taken pieces:");
        for (var takenPiece : takenPieces)
            drawTakenPiece(drawnBoard, takenPiece);
    }

    private void drawTakenPiece(StringBuilder drawnBoard, Piece piece)
    {
        drawnBoard.append(oneSpace);
        switch (piece.getColor())
        {
            case black -> drawnBoard.append("(").append(getPieceCharacter(piece)).append(")");
            case white -> drawnBoard.append(getPieceCharacter(piece));
        }
    }

    private void drawRow(Board board, HashSet<Coords> availableMoves, StringBuilder drawnBoard, int y) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        for (var rowLevel = 0; rowLevel < 3; ++rowLevel)
            drawRowLevel(board, availableMoves, drawnBoard, y, rowLevel);
        drawnBoard.append(twoSpaces).append(columnRow).append(newLine);
    }

    private void drawRowLevel(Board board, HashSet<Coords> availableMoves, StringBuilder drawnBoard, int y, int columnLevel) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        if (columnLevel == 1)
            drawnBoard.append(y).append(oneSpace);
        else
            drawnBoard.append(twoSpaces);
        for (var x = 1; x <= 8; ++x)
            drawColumn(board, availableMoves, drawnBoard, y, columnLevel, x);
        drawnBoard.append(columnSeparator).append(newLine);
    }

    private void drawColumn(Board board, HashSet<Coords> availableMoves, StringBuilder drawnBoard, int y, int columnLevel, int x) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        var coords = new Coords(x, y);
        if (columnLevel == 1)
            drawLevelOneColumn(board, drawnBoard, coords);
        else
            if (availableMoves.contains(coords))
                drawnBoard.append(availableColumn);
            else
                drawnBoard.append(emptyColumn);
    }

    private void drawLevelOneColumn(Board board, StringBuilder drawnBoard, Coords coords) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        if (board.pieceOnField(coords))
            drawPieceInField(board, drawnBoard, coords);
        else
            drawnBoard.append(emptyColumn);
    }

    private void drawPieceInField(Board board, StringBuilder drawnBoard, Coords coords) throws Board.FieldNotFound, Field.NoPieceAvailable
    {
        drawnBoard.append(columnSeparator);
        var piece = board.getPiece(coords);
        switch (piece.getColor())
        {
            case black -> drawnBoard.append(twoSpaces).append("(").append(getPieceCharacter(piece)).append(")").append(twoSpaces);
            case white -> drawnBoard.append(threeSpaces).append(getPieceCharacter(piece)).append(threeSpaces);
        }
    }

    private String getPieceCharacter(Piece piece)
    {
        return switch (piece.getClass().getSimpleName())
        {
            case "Bischop" -> "B";
            case "King" -> "K";
            case "Knight" -> "N";
            case "Pawn" -> "P";
            case "Queen" -> "Q";
            case "Rook" -> "R";
            default -> "";
        };
    }
}