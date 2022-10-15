package Chess.Core.Usecases.ListAvailableMoves;

import Chess.Core.Board;
import Chess.Core.Color;
import Chess.Core.Coords;
import Chess.Core.Field;
import Chess.Core.Pieces.*;
import org.junit.jupiter.api.BeforeEach;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class ListAvailableKingMovesTest
{
    private ListAvailableMoves usecase;

    @BeforeEach
    void setup()
    {
        usecase = new ListAvailableKingMoves();
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithoutBlockingPieces() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 5);
        King king = new King(Color.black, board);

        board.setPiece(coords, king);
        assertEquals(usecase.list(board, coords).size(), 8);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionsMovesWithBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        King king = new King(Color.black, board);
        Pawn pawn = new Pawn(Color.black, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(3,5), pawn);
        assertEquals(usecase.list(board, coords).size(), 7);
    }

    @Test
    void canReturnHashsetWithtMultipleDirectionsMovesWithBlockingPiecesFromOtherColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3,6);
        King king = new King(Color.black, board);
        Pawn pawn = new Pawn(Color.white, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(3,7), pawn);
        assertEquals(usecase.list(board, coords).size(), 8);
    }

    @Test
    void canReturnHashsetWith1DirectionFreeWithBlockingPieceFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.black, board);
        Bischop bischop = new Bischop(Color.black, board);
        King king = new King(Color.black, board);
        Queen queen = new Queen(Color.black, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(3, 7), pawn);
        board.setPiece(new Coords(4, 6), bischop);
        board.setPiece(new Coords(2, 6), queen);
        assertEquals(usecase.list(board, coords).size(), 5);
    }

    @Test
    void canReturnHashsetWithMultipleDirectionMovesWithMultipleBlockingPiecesFromSameColor() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(3, 6);
        Pawn pawn = new Pawn(Color.white, board);
        Bischop bischop = new Bischop(Color.white, board);
        King king = new King(Color.black, board);
        Queen queen = new Queen(Color.white, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(3, 7), pawn);
        board.setPiece(new Coords(4, 6), bischop);
        board.setPiece(new Coords(2, 6), queen);
        assertEquals(usecase.list(board, coords).size(), 8);
    }

    @Test
    void canReturnHashsetWithShortCastlinMoves() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(5, 1);
        Rook rook = new Rook(Color.black, board);
        King king = new King(Color.black, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(8, 1), rook);
        assertEquals(usecase.list(board, coords).size(), 6);
    }

    @Test
    void canReturnHashsetWithLongCastlinMoves() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(5, 1);
        Rook rook = new Rook(Color.black, board);
        King king = new King(Color.black, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(1, 1), rook);
        assertEquals(usecase.list(board, coords).size(), 6);
    }

    @Test
    void canReturnHashsetWithLongAndShortCastlinMoves() throws Field.NoPieceAvailable, Board.FieldNotFound
    {
        Board board = new Board();
        Coords coords = new Coords(5, 1);
        Rook rookLong = new Rook(Color.black, board);
        Rook rookShort = new Rook(Color.black, board);
        King king = new King(Color.black, board);

        board.setPiece(coords, king);
        board.setPiece(new Coords(1, 1), rookLong);
        board.setPiece(new Coords(8, 1), rookShort);
        assertEquals(usecase.list(board, coords).size(), 7);
    }

}
