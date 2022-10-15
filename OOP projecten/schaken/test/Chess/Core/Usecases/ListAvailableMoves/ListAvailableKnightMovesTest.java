package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.*;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class ListAvailableKnightMovesTest
{
    private ListAvailableKnightMoves usecase;

    @BeforeEach
    public void setup()
    {
        usecase = new ListAvailableKnightMoves();
    }

    @Test
    public void canReturnHashsetWith2DirectionsMovesWithoutBlockingPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(1, 1);
        Knight knight = new Knight(Color.black, board);
        board.setPiece(coords, knight);
        var result = usecase.list(board, coords);
        assertEquals(2, result.size());
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Knight knight = new Knight(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);

        board.setPiece(coords, knight);
        board.setPiece(new Coords(5,5), pawn);
        assertEquals(7, usecase.list(board, coords).size());
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithBlockingPiecesFromOtherColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Knight knight = new Knight(Color.black, board);
        Pawn pawn = new Pawn(Color.white, board);

        board.setPiece(coords, knight);
        board.setPiece(new Coords(5,5), pawn);
        assertEquals(8, usecase.list(board, coords).size());
    }

    @Test
    void canReturnHashsetWithMultipleBlockingPieceFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.black, board);
        Bischop bischop = new Bischop(Color.black, board);
        Knight knight = new Knight(Color.black, board);
        Queen queen = new Queen(Color.black, board);

        board.setPiece(coords, knight);
        board.setPiece(new Coords(5, 5), pawn);
        board.setPiece(new Coords(4, 8), bischop);
        board.setPiece(new Coords(2, 4), queen);
        assertEquals(5, usecase.list(board, coords).size());
    }

    @Test
    void canReturnHashsetWithMultipleBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.white, board);
        Bischop bischop = new Bischop(Color.white, board);
        Rook rook = new Rook(Color.black, board);
        Queen queen = new Queen(Color.white, board);

        board.setPiece(coords, rook);
        board.setPiece(new Coords(5, 5), pawn);
        board.setPiece(new Coords(4, 8), bischop);
        board.setPiece(new Coords(2, 4), queen);
        assertEquals(8, usecase.list(board, coords).size());
    }
}