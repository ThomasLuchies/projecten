package Chess.Core.StateAnalysers;

import Chess.Core.*;
import Chess.Core.Pieces.*;
import Chess.Core.Usecases.LocateKing.LocateKing;
import org.junit.jupiter.api.Test;

import static org.junit.jupiter.api.Assertions.assertEquals;

public class CheckmateAnalyserTests
{
    @Test
    public void returnsCheckmateState() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var checkMateAnalyser = new CheckmateAnalyser();
        var board = new Board();
        var king = new King(Color.black, board);
        var queen = new Queen(Color.white, board);
        var pawn = new Pawn(Color.white, board);
        board.setPiece(new Coords(7,8), king);
        board.setPiece(new Coords(7,7), queen);
        board.setPiece(new Coords(6,6), pawn);
        assertEquals(State.checkmate, checkMateAnalyser.analyse(State.check, board, Color.black));
    }

    @Test
    public void returnsCheckmateState_whenKingInCheckButStillHasPiecesOnTheBoard() throws Field.NoPieceAvailable, Board.FieldNotFound, LocateKing.KingNotFound
    {
        var checkMateAnalyser = new CheckmateAnalyser();
        var board = new Board();

        board.setPiece(new Coords(1,1), new Rook(Color.white, board));
        board.setPiece(new Coords(2,1), new Bischop(Color.black, board));
        board.setPiece(new Coords(3,1), new Bischop(Color.white, board));
        board.setPiece(new Coords(5,1), new King(Color.white, board));
        board.setPiece(new Coords(7,1), new Queen(Color.black, board));
        board.setPiece(new Coords(4,2), new Pawn(Color.white, board));
        board.setPiece(new Coords(5,2), new Pawn(Color.white, board));
        board.setPiece(new Coords(6,2), new Pawn(Color.white, board));
        board.setPiece(new Coords(3,3), new Pawn(Color.white, board));
        board.setPiece(new Coords(7,3), new Pawn(Color.white, board));
        board.setPiece(new Coords(8,4), new Pawn(Color.white, board));
        board.setPiece(new Coords(4,5), new Pawn(Color.black, board));
        board.setPiece(new Coords(1,6), new Pawn(Color.white, board));
        board.setPiece(new Coords(1,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(2,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(3,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(5,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(6,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(7,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(8,7), new Pawn(Color.black, board));
        board.setPiece(new Coords(1,8), new Rook(Color.black, board));
        board.setPiece(new Coords(5,8), new King(Color.black, board));
        board.setPiece(new Coords(6,8), new Bischop(Color.black, board));
        board.setPiece(new Coords(7,8), new Knight(Color.black, board));
        board.setPiece(new Coords(8,8), new Rook(Color.black, board));

        assertEquals(State.checkmate, checkMateAnalyser.analyse(State.active, board, Color.white));
    }
}